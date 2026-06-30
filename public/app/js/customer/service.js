export const customerService = {
    load: async id => {
        let result = [];
        await fetch('customer/load', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify({id: id}),
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
             // Ver fallos mas detallados si es en php fetch('customer/load') .then(response => response.text()) .then(text => { console.log(text); }); 
        })
        .then(data => { 
            if(data.success){
                result = data.data;
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
        
       return result;
    },

    save: customer => {
        fetch('customer/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(customer)
        })
            .then(response => {
                if (response.ok) return response.json();
                throw new Error(response, response.status);
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                }
                else {
                    alert(data.message);
                }
            })
            .catch(error => { console.error("Ha ocurrido un error", error); });
    },

    update: customer => {
        fetch('customer/update', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(customer)
        })
            .then(response => {
                if (response.ok) return response.json();
                throw new Error(response, response.status);
            })
            .then(data => {
                if (data.success) {
                    alert(data.message);
                }
                else {
                    alert(data.message);
                }
            })
            .catch(error => { console.error("Ha ocurrido un error", error); });
    },
    
    list: async filters => {
        let result = [];
        await fetch('customer/list', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(filters)
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
        })
        .then(data => { 
            if(data.success){
                result = data.data;
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });

        return result;
    }, 

    delete: async id =>{
        let result = [];
        await fetch('customer/delete', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify({id: id}),
        })
        .then(response => {
            if (response.ok) return response.json();
            throw new Error(response, response.status);
             // Ver fallos mas detallados si es en php fetch('customer/load') .then(response => response.text()) .then(text => { console.log(text); }); 
        })
        .then(data => { 
            if(data.success){
                result = data.data;
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
        
       return result;
    }
};