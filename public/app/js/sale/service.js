export const saleService = {
    load: async id => {
        let result = [];
        await fetch('sale/load', {
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
             // Ver fallos mas detallados si es en php fetch('sale/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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

    save:  sale => {
        fetch('sale/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(sale)
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

    update: sale => {
        fetch('sale/update', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(sale)
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
        await fetch('sale/list', {
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
        await fetch('sale/delete', {
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
             // Ver fallos mas detallados si es en php fetch('sale/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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