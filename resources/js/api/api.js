const axios = require('axios');

function kebabCaseToCamel(str) {
    return str.replace(/(\-\w)/g, (matches) => matches[1].toUpperCase());
}

class API {
    constructor({ url }) {
        this.url = url
        this.endpoints = {}
    }
    /**
     * Create and store a single entity's endpoints
     * @param {A entity Object} entity
     */
    createEntity(entity) {
        /**
         * If there is a - in the entity.name, then change it 
         * to camelCase. E.g 
         * ```
         * myApi.createEntity({ name : 'foo-bar'})
         * myApi.endpoints.fooBar.getAll(...)
         */

        const name = kebabCaseToCamel(entity.name);
        this.endpoints[name] = this.createBasicCRUDEndpoints(entity);
    }

    createEntities(arrayOfEntity) {
        arrayOfEntity.forEach(this.createEntity.bind(this));
    }
    /**
     * Create the basic endpoints handlers for CRUD operations
     * @param {A entity Object} entity
     */
    createBasicCRUDEndpoints({ name }) {
        var endpoints = {};

        const resourceURL = `${this.url}/${name}`;

        endpoints.getAll = (params) => axios.get(resourceURL, params);
        
        // endpoints.getAll = ({ query = {} }, config = {}) => {
        //     console.log(resourceURL, query, config);
        //     return axios.get(resourceURL, Object.assign({ params: { query }, config }));
        // };

        endpoints.getOne = ({ id }, config = {}) => axios.get(`${resourceURL}/${id}`, config);

        endpoints.create = (toCreate, config = {}) => axios.post(resourceURL, toCreate, config);

        endpoints.update = (toUpdate, config = {}) => axios.put(`${resourceURL}/${toUpdate.id}`, toUpdate, config);

        endpoints.patch = ({ id }, toPatch, config = {}) => axios.patch(`${resourceURL}/${id}`, toPatch, config);

        endpoints.delete = ({ id }, config = {}) => axios.delete(`${resourceURL}/${id}`, config);

        return endpoints

    }

}

export default API

/**
 * https://codeburst.io/how-to-call-api-in-a-smart-way-2ca572c6fe86
 *
 * Usage :
 *
 * create an API instance : *
 * const myApi = new API({ url:'http://localhost:8080/api' })
 *
 * then create all the correct handles for the posts entity with one line of code
 * myApi.createEntity({ name: 'posts' })
 *
 * --------------------------------------
 * fetch all posts:
 *
 * myApi.endpoints.posts.getAll()
 *   .then(({ data }) => console.log(data))
 * ---------------------------------------
 * fetch one by id :
 *
 * myApi.endpoints.posts.getOne({ id: 1})
 *  .then(({data}) => console.log(data))
 *
 * -------------------------------------
 * create/update and delete a post :
 *
 * myApi.endpoints.posts.create(post)
 *  .then(({ data }) => myApi.endpoints.posts.update(data))
 *  .then(({ data }) => myApi.endpoints.posts.delete(data))
 *  .catch((err) => console.log(err))
 */