let actions = {
   
    createStudent({commit}, post) {
        axios.post('/api/students', post)
            .then(res => {
                commit('CREATE_POST', res.data.data)
                console.log(res)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchstudents({commit}) {
        
        axios.get('/api/students')
            .then(res => {
                commit('FETCH_POSTS', res.data.data)
                
                console.log(res.data.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletestudent({commit}, post) {
        axios.delete(`/api/students/${post.id}`)
      
            .then(res => {
                if (res.data.data === 'ok')
                    commit('DELETE_POST', post)
            }).catch(err => {
            console.log(err)
        })
        alert("DS");
    }
}

export default actions