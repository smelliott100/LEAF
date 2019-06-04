import axios from 'axios'

const http = axios.create({
    baseURL: '/',
    headers: { 'Cache-Control': 'no-cache' },
});

export default {

    getRequests() {
        return http.get('./requestTestData.json').then(response =>{ return response})
    },
    getInbox() {
        return http.get('./inboxTestData.json').then(response =>{ return response})
    }
}
