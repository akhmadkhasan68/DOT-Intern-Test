function submitForm(e)
{
    let data = new FormData(e)

    axios.post(e.action, data).then(data => {
        if(data.status == "200"){
            let message = data.data.message
            toastr.success(message, "Success")

            setTimeout(() => {
                window.location.replace(data.data.redirect);
            }, 1000);
        }
    }).catch(data => {
        let errors = data.response.data.errors

        for (let [key, values] of Object.entries(errors)) {
            values.forEach(value => {
                toastr.error(value, "Error")
            });
        }
    })
}

function deleteData(e)
{
    let data = new FormData()
    data.append("_method", "DELETE");
    data.append("_token", $('meta[name="csrf-token"]').attr('content'));

    Swal.fire({
        title: 'Are you sure to do this action?',
        showCancelButton: true,
        confirmButtonText: 'Yes',
    }).then((result) => {
        if (result.isConfirmed) {
            axios.post(e.attributes.action.value, data).then(data => {
                if(data.status == "200"){
                    let message = data.data.message
                    toastr.success(message, "Success")
                    datatable.ajax.reload(null, false)
                }
            }).catch(data => {
                console.log(data)
            })      
        } 
    })
}

function onchangeProvince(e, target)
{
    let value = e.value
    axios.get(`/api/regencies/${value}`).then(data => {
        console.log(data)
        if(data.status == "200"){
            let html = `<option></option>`
            data.data.data.forEach(item => {
                html += `<option value="${item.id}">${item.name}</option>`
            });

            $(target).html(html);
        }
    }).catch(data => {
        console.log(data)
    })
}

function onchangeRegency(e, target)
{
    let value = e.value
    axios.get(`/api/districts/${value}`).then(data => {
        console.log(data)
        if(data.status == "200"){
            let html = `<option></option>`
            data.data.data.forEach(item => {
                html += `<option value="${item.id}">${item.name}</option>`
            });

            $(target).html(html);
        }
    }).catch(data => {
        console.log(data)
    })
}