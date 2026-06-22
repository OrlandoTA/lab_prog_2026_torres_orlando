export const userService = {
    load: id => {
        return users.find(user => user.id === id);
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
    
    list:  filters => {
        let result = [];
        fetch('user/list', {
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
                if (data.success) {
                    result = data.data;
                }
                else {
                    alert(data.message);
                }
            })
            .catch(error => { console.error("Ha ocurrido un error", error) });

        return result;
    }
};