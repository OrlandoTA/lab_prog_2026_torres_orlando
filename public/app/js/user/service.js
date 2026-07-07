export const userService = {
    load: async id => {
        let result = [];
        await fetch('user/load', {
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
             // Ver fallos mas detallados si es en php fetch('user/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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

    save: user => {
        fetch('user/save', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(user)
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
    
    updatePass: user => {
        fetch('user/updatePass', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(user)
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

    update: user => {
        
        fetch('user/update', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            body: JSON.stringify(user)
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
        await fetch('user/list', {
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
        await fetch('user/delete', {
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
             // Ver fallos mas detallados si es en php fetch('user/load') .then(response => response.text()) .then(text => { console.log(text); }); 
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
    
    profile: async () => {

        let result = [];

        await fetch('user/profileLoad')
            .then(response => response.json())
            .then(data => {

                if(data.success){
                    result = data.data;
                }

            });
        return result;
    }
    
};