class Requests {
    constructor() {
        this.xhr = new XMLHttpRequest();
    }
    createRequestTo(direction, dataToSend = {} ){
        let result = 'Sin valor inicial';
        this.xhr.onreadystatechange = () => {
            if ((this.xhr.readyState === 4)&&(this.xhr.status === 200)){
                result = JSON.parse(this.xhr.responseText);
            }
            else{
                result = ' (Ha habido algún problema en la petición.) ';
            }
        };
        this.xhr.open('POST', direction, false);
        this.xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        this.xhr.send('data='+JSON.stringify(dataToSend));
        return result;
    }
}