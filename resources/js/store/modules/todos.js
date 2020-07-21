import axios from 'axios';

const state = {
    todos: []
};

const getters = {
    allTodos: (state) => state.todos
};

const actions = {
    async fetchTodos({commit}) {
        const response = await axios.get('/todos')
                                    .catch(Error => console.log(Error));
        
        commit('setTodos', response.data);
    },
    async addTodos({commit}, title) {
        const response = await axios.post('/todos', {title})
                                    .catch(Error => console.log(Error));
        commit('newTodo', response.data);
        // console.log(response.data);
    },
    async removeTodo({commit}, id) {
        const response = await axios.post('/todos/remove', {id})
                                    .catch(Error => console.log(Error));
        commit('oldTodo', response.data);
    },
    async filterTodos({commit}, val) {
        const response = await axios.get(`/todos/limit/${val}`)
                                    .catch(Error => console.log(Error));
        commit('setTodos', response.data);
    },
    async completeTodo({commit}, todo) {
        const response = await axios.post('/todos/complete', {todo})
                                    .catch(Error => console.log(Error));
        commit('setTodos', response.data);
    }
};

const mutations = {
    setTodos: (state, todos) => (state.todos = todos),
    newTodo: (state, todo) => (state.todos.unshift(todo)),
    oldTodo: (state, todo) => (state.todos = state.todos.filter(Element => {return Element.id != todo.id}))
};

export default {
    state,
    getters,
    actions,
    mutations
}