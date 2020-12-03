function loadContent(url,cb){
    console.log('Connecting to:',url);
    const fetching = fetch(url);
    fetching
        .then(resp => resp.json())
        .then(data => cb(data))
        .catch(err => console.error(err));
}
async function asynchronousLoadContent(url,cb){
    console.log('Connecting to:',url);
    await fetch(url,cb)
        .then(resp => resp.json())
        .then(data => cb(data))
        .catch(err => console.error(err));
}