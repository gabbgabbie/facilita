import HttpClientBase from './HttpClientBase.js';

export class HttpUser extends HttpClientBase {
    constructor() {
        super(`http://localhost/facilita/api/users`);
    }

    async createUser(userData) {
        return this.post('/add', userData);
    }

    async createEmployee(userData) {
        return this.post('/addEmployee', userData);
    }

    async loginUser(loginData) {
        return this.get('/login', loginData);
    }

    async listById(id) {
        return this.get(`/id/:id`, { id });
    }

    async updateUser(userData) {
    return this.post('/update', userData);
}


}