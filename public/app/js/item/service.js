export const itemService = {
    load: async id => {
        let result = [];
        await fetch('item/load', {
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
             // Ver fallos mas detallados si es en php fetch('item/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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

    save:  item => {
        fetch('item/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(item)
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

    update: item => {
        fetch('item/update', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(item)
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
        await fetch('item/list', {
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
        await fetch('item/delete', {
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
             // Ver fallos mas detallados si es en php fetch('item/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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


    search: async buscar => {

        let result = [];

        await fetch("item/search", {
            method: "POST",
            headers: {
                "Content-Type":"application/json",
                "Accept":"application/json"
            },
            body: JSON.stringify({
                buscar
            })
        })
        .then(r => r.json())
        .then(data => {

            if(data.success){
                result = data.data;
            }

        });

        return result;
    },
};