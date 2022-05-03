var store = []
fetchStore()
async function fetchStore(){
    const data = await axios.get('/storeAllData')
    store = data.data.data

}

