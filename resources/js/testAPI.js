import axios from 'axios'

export default {
    getRequests() {
        return axios.get('./requestTestData.json').then(response =>{ return response})
    },
    getInbox() {
        return axios.get('./inboxTestData.json').then(response =>{ return response})
    }
}
