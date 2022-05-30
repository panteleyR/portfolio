export const state = () => ({
  list: [],
})

export const getters = {
  list: (state) => {
    return state.list
  }
}

export const mutations = {
  setList (state, payload) {
    state.list = payload
  }
}

export const actions = {
  getAll ({ commit }) {
    return this.$axios.$get('/articles').then((res) => {
      commit('setList', res.data)
    })
  },

  create ({ commit, dispatch }, data) {
    return this.$axios.$post('/articles', data)
  },

  delete ({ commit, dispatch }, id) {
    return this.$axios.$delete('/articles/' + id)
  },

  show ({ commit, dispatch }, id) {
    return this.$axios.$get('/articles/' + id)
  },

  update ({ commit, dispatch }, update) {
    return this.$axios.$patch('/articles/' + update.id, update)
  }
}
