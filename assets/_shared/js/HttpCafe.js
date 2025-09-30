import HttpClientBase from './HttpClientBase.js';

export class HttpCafe extends HttpClientBase {
    constructor() {
        super(`http://localhost/facilita/api/cafes`);
    }

    async createCafe(cafeData) {
        return this.post('/add', cafeData);
    }

    
}