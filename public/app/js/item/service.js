export const itemService = {
    load: id => {
        return items.find(item => item.id === id);
    },


    save: user => {
    fetch('item/save', {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
        },
        body: JSON.stringify(user)
    })
    .then(response => response.text())
    .then(data => {
        console.log("RESPUESTA:");
        console.log(data);
    })
    .catch(error => {
        console.error("Ha ocurrido un error", error);
    });
},
    /*
    save: item => {
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
            if(data.success){
                alert(data.message);
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => { console.error("Ha ocurrido un error", error); });
    },*/
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
    }
};