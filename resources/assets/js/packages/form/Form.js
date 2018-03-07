import Errors from './Errors';

class Form{

	constructor(data){
		this.originalData = data;
		this.data = data;
		this.errors = new Errors();
		this.message = false;
		this.isPosting = false;
	}

	setData(model){
		for(let property in model){
			if(this.originalData.hasOwnProperty(property)){
				this.data[property] = model[property]
			}
		}
	}

	setItem(name, value){
		this.data[name] = value;
	}

	reset(){
		for(let filed in this.originalData){
			this.data[filed] = '';
		}
		this.errors.clear();
	}

	post(url){
		return this.submit('post', url);
	}

	put(url){
		return this.submit('put', url);
	}

	delete(url){
		return this.submit('delete', url);
	}

	submitStatus(){
		return (this.errors.any() || this.isPosting); 
	}

	submit(requestType, url){
		this.isPosting = true;
		return new Promise((resolve, reject) => {
			axios[requestType](url,this.data).then(response => {
				this.onSuccess(response.data);
				resolve(response.data);
			})
			.catch(error => {
				this.onFail(error);
				reject(error);
			});
		});
	}

	onSuccess(data){
		this.isPosting = false;
		this.errors.clear();
		//this.reset();
	}

	onFail(error){
		this.isPosting = false;
		if(error.response.data.errors){
			this.errors.record(error.response.data.errors);
        }
        if(error.response.data.message){
        	this.message = error.response.data.message;
        }
	}
}

export default Form;