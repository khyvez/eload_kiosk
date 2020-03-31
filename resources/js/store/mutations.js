let mutations = {
    CREATE_POST(state, post) {
        state.posts.unshift(post)
    },
    FETCH_POSTS(state, posts) {
        return state.students = posts
    },
    DELETE_POST(state, post) {
        let index = state.students.findIndex(item => item.id === post.id)
        state.posts.splice(index, 1)
    }

}
export default mutations