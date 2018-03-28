print("Starting TenableIO Report Script")
import json
from datetime import datetime
from dateutil.parser import parse
from dateutil.tz import tzutc
import requests
import sys
import time
from operator import itemgetter

print("Done Importing Libraries")
#these should be passed in from the jenkins job for the search string and access keys
#http = urllib3.PoolManager()

search_string = str(sys.argv[1])
access_key = str(sys.argv[2])
secert_key = str(sys.argv[3])

# Default value is 30
report_wait_time_interval = 10

# Default value is 30
number_of_trys_to_get_report = 30

text_file = open("Tenable_Scan_Output.txt", "w")
headers = {'X-ApiKeys': 'accessKey=' + access_key + '; secretKey=' + secert_key}
report_id = ''
tenable_date_key = 'created_at'

# initialize report date to a past date for finding most recent report
report_date = datetime(1992, 4, 22, 21, 0, 51, 504000, tzinfo=tzutc())
number_of_attempts_to_get_report_list = 0
print("Looking for Report ID")
while report_id == '':
   s = json.loads(requests.get('https://cloud.tenable.com/container-security/api/v1/container/list', headers=headers).text)
   for i in range(0, len(s)):
       try:
           if s[i]['name'] == search_string:
               temp_date = parse(str(s[i][tenable_date_key]))
               if report_date < temp_date:
                   report_date = temp_date
                   report_id = s[i]['id']
       except:
           print('key error for first api call')
   time.sleep(report_wait_time_interval)
   number_of_attempts_to_get_report_list = number_of_attempts_to_get_report_list + 1
   if number_of_attempts_to_get_report_list == number_of_trys_to_get_report:
        sys.exit(1)


print('Found our report ID')
print(report_id)

report = ''
report_string = ''
print("Looking for Report")

report_attempt_count = 0
ordered_report = {}
ordered_report['findings'] = []
while report_string == '':        
    report = json.loads(requests.get('https://cloud.tenable.com/container-security/api/v1/reports/show?container_id=' + report_id, headers=headers).text)
    try:
        if report["reason"] == "Container analysis failed":
            print('!!!TENABLE SCAN FAILED!!!')
            report_string="Report in TenableIO failed"
            break
    except:
        print('report reason not found, moving on')
    try:
        print('checking if there are report findings')
        report_string = ''
        if len(report['findings']) > 0:
            for i in range(len(report['findings'])):
                # build array of finding objects and add the cvss_score = 0 field to each if a finding does not have one
                if 'cvss_score' not in report['findings'][i]['nvdFinding'].keys():
                    report['findings'][i]['nvdFinding']['cvss_score'] = 0
                try:
                    if report['findings'][i]['nvdFinding']['cvss_score'] == "":
                        report['findings'][i]['nvdFinding']['cvss_score'] = 0
                    else:
                        report['findings'][i]['nvdFinding']['cvss_score'] = float(report['findings'][i]['nvdFinding']['cvss_score'])
                except:
                    print(report['findings'][i]['nvdFinding'])
                    report['findings'][i]['nvdFinding']['cvss_score'] = 0
                ordered_report['findings'].append(report['findings'][i]['nvdFinding'])
            
            # Order the report
            ordered_report['findings'] = sorted(ordered_report['findings'], key=itemgetter('cvss_score'), reverse=True)

            # Try to construct report headers
            try:
                report_string = '%%%%%%%%BEGIN REPORT HEADER%%%%%%%%' + '\n\n'
                report_string = report_string + 'Operating System' + report['os'] + ': ' + report['os_version'] + '\n'
                report_string = report_string + 'Operating System Architecture: ' + report['os_architecture'] + '\n'
                report_string = report_string + 'Total Risk Score: ' + str(report['risk_score']) + '\n'
                report_string = report_string + 'The list of findings below are ordered by CVSS_SCORE starting with the highest score first.\n\n'
                report_string = report_string + '%%%%%%%%END REPORT HEADER%%%%%%%%' + '\n\n\n'
            except:
                report_string = '%%%%%%%%BEGIN REPORT HEADER%%%%%%%%' + '\n\n'
                report_string = report_string + 'No Report Headers Found!\n'
                report_string = report_string + 'The list of findings below are ordered by CVSS_SCORE starting with the highest score first.\n\n'
                report_string = report_string + '%%%%%%%%END REPORT HEADER%%%%%%%%' + '\n\n\n'

            # Append all the findings to the body of the report
            for i in range(len(ordered_report['findings'])):
                report_string = report_string + '%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% \n'
                report_string = report_string + 'CVE Number: ' + ordered_report['findings'][i]['cve'] + '\n'
                report_string = report_string + 'published_date: ' + ordered_report['findings'][i]['published_date'] + '\n'
                report_string = report_string + 'CVSS SCORE: ' + str(ordered_report['findings'][i]['cvss_score']) + '\n'
                report_string = report_string + 'modified_date: ' + ordered_report['findings'][i]['modified_date'] + '\n'    
                report_string = report_string + '\nDescription: \n' + ordered_report['findings'][i]['description'] + '\n'
                report_string = report_string + '\n\nRemediation: \n' + ordered_report['findings'][i]['remediation'] + '\n'
                report_string = report_string + '%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% \n'
        else:
            report_string = 'No findings found.'
    except:
        print('no report found this time, trying again')
        report_attempt_count = report_attempt_count + 1
        if report_attempt_count == number_of_trys_to_get_report:
            report_string = 'Report took longer than 15 mins to generate, exiting script and proceeding with build.'
            break
        
    time.sleep(report_wait_time_interval)

print(report_string)
text_file.write(report_string)
text_file.close()

if report_string=="Report in TenableIO failed":
    sys.exit(1)
