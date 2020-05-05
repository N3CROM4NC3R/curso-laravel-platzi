(function(){
    let deleteButton = document.getElementsByClassName('delete-btn');
    let editButton = document.getElementsByClassName('edit-btn');

    function deleteEvent(e){
        e.preventDefault();
        const id = e.target.dataset.reportid;
        let token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');

        Swal.fire({
            icon:'warning',
            title: `Delete?`,
            text:`You wanna delete this report number ${id}?`,
            showCancelButton:true,
            confirmButtonText:'Yes',
            showLoaderOnConfirm:true,
            preConfirm: (login) =>{

                let data = {
                    id:id
                };

                return fetch(`/expense_reports/${id}`,{
                    headers:{
                        "Content-Type" : "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN":token
                    },
                    method:'DELETE',
                    credentials: "same-origin",
                    body: JSON.stringify(data),
                })
                .then((response)=>{
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        'Delete failed!,try again'
                    )
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result)=> {
            if(result.value){
                Swal.fire({
                    icon:'success',
                    title:"Deleted!"

                });
                deleteElementReport(id);
            }
        });
    }
    function editEvent(e){
        e.preventDefault();
        const id = e.target.dataset.reportid;
        let token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');

        Swal.fire({
            icon:'question',
            title: `Update`,
            text:'Insert the new name',
            input:'text',
            showCancelButton:true,
            confirmButtonText:'Update',
            showLoaderOnConfirm:true,
            preConfirm: (title) =>{

                let data = {
                    id:id,
                    title:title,
                };

                return fetch(`/expense_reports/${id}`,{
                    headers:{
                        "Content-Type" : "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN":token
                    },
                    method:'PUT',
                    credentials: "same-origin",
                    body: JSON.stringify(data),
                })
                .then((response)=>{
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Updated failed,Try again.`
                    );
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result)=> {
            if(result.value){
                Swal.fire({
                    icon:'success',
                    title:"Updated!"

                });
                editElementReport(id,result.value.title);
            }
        });
    }
    function editEvent(e){
        e.preventDefault();
        const id = e.target.dataset.reportid;
        let token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');

        Swal.fire({
            icon:'question',
            title: `Update`,
            text:'Insert the new name',
            input:'text',
            showCancelButton:true,
            confirmButtonText:'Update',
            showLoaderOnConfirm:true,
            preConfirm: (title) =>{

                let data = {
                    id:id,
                    title:title,
                };

                return fetch(`/expense_reports/${id}`,{
                    headers:{
                        "Content-Type" : "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN":token
                    },
                    method:'PUT',
                    credentials: "same-origin",
                    body: JSON.stringify(data),
                })
                .then((response)=>{
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Updated failed,Try again.`
                    );
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result)=> {
            if(result.value){
                Swal.fire({
                    icon:'success',
                    title:"Updated!"

                });
                editElementReport(id,result.value.title);
            }
        });
    }
    function editEvent(e){
        e.preventDefault();
        const id = e.target.dataset.reportid;
        let token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');

        Swal.fire({
            icon:'question',
            title: `Update`,
            text:'Insert the new name',
            input:'text',
            showCancelButton:true,
            confirmButtonText:'Update',
            showLoaderOnConfirm:true,
            preConfirm: (title) =>{

                let data = {
                    id:id,
                    title:title,
                };

                return fetch(`/expense_reports/${id}`,{
                    headers:{
                        "Content-Type" : "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN":token
                    },
                    method:'PUT',
                    credentials: "same-origin",
                    body: JSON.stringify(data),
                })
                .then((response)=>{
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Updated failed,Try again.`
                    );
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result)=> {
            if(result.value){
                Swal.fire({
                    icon:'success',
                    title:"Updated!"

                });
                editElementReport(id,result.value.title);
            }
        });
    }
    function createEvent(e){
        e.preventDefault();
        const id = e.target.dataset.reportid;
        let token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');

        Swal.fire({
            icon:'question',
            title: `Create new report`,
            text:'Insert the name',
            input:'text',
            showCancelButton:true,
            confirmButtonText:'Create',
            showLoaderOnConfirm:true,
            preConfirm: (title) =>{

                let data = {
                    title:title,
                };

                return fetch(`/expense_reports`,{
                    headers:{
                        "Content-Type" : "application/json",
                        "accept": "application/json, text-plain, */*",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN":token
                    },
                    method:'POST',
                    credentials: "same-origin",
                    body: JSON.stringify(data),
                })
                .then((response)=>{
                    return response.json();
                })
                .catch(error => {
                    Swal.showValidationMessage(
                        `Create failed,Try again.`
                    );
                })
            },
            allowOutsideClick: () => !Swal.isLoading()
        })
        .then((result)=> {
            if(result.value){
                Swal.fire({
                    icon:'success',
                    title:"Created!"

                });
                console.log(result.value.id);
                newElementReport(result.value.id,result.value.title);
            }
        });
    }
    function deleteElementReport(id){
        let elementReportId = document.querySelector(`tr[data-reportid="${id}"]`);
        elementReportId.parentNode.removeChild(elementReportId);
        deleteButton = document.getElementsByClassName('edit-btn');
    }
    function editElementReport(id,newName){
        let elementReportId = document.querySelector(`tr[data-reportid="${id}"]`);
        editButton = document.getElementsByClassName('delete-btn');
        elementReportId.childNodes[1].innerHTML = newName;
    }
    function newElementReport(id,title){

        let elementReport = document.createElement('tr');
        elementReport.setAttribute('data-reportid',id);

        let elementReportName = document.createElement('td');
        let reportNameElement = document.createElement('a');
        reportNameElement.setAttribute('href',`/expense_reports/${id}`);
        elementReportName.appendChild(reportNameElement);

        reportNameElement.innerHTML = title;

        let elementReportEditButton = document.createElement('td');
        let editButtonElement = document.createElement('a');
        editButtonElement.setAttribute('href',`/expense_reports/${id}/edit`);
        editButtonElement.setAttribute('data-reportId',id);
        editButtonElement.classList.add('btn');
        editButtonElement.classList.add('btn-primary');
        editButtonElement.classList.add('edit-btn');

        editButtonElement.innerHTML = "Edit";
        elementReportEditButton.appendChild(editButtonElement);

        let elementReportDeleteButton = document.createElement('td');
        let deleteButtonElement = document.createElement('a');
        deleteButtonElement.setAttribute('href',`/expense_reports/${id}/delete`);
        deleteButtonElement.setAttribute('data-reportId',id);
        deleteButtonElement.classList.add('btn');
        deleteButtonElement.classList.add('btn-primary');
        deleteButtonElement.classList.add('delete-btn');
        deleteButtonElement.innerHTML = "Delete";
        elementReportDeleteButton.appendChild(deleteButtonElement);

        let table = document.querySelector('.table');

        elementReport.appendChild(elementReportName);
        elementReport.appendChild(elementReportEditButton);
        elementReport.appendChild(elementReportDeleteButton);

        table.appendChild(elementReport);
        console.log(table);

        let deleteButton = document.getElementsByClassName('delete-btn');
        let editButton = document.getElementsByClassName('edit-btn');

        for(let i=0;i<deleteButton.length;i++){
            deleteButton[i].addEventListener('click',deleteEvent);
        }
        for(let i=0;i<deleteButton.length;i++){
            editButton[i].addEventListener('click',editEvent);
        }
    }

    for(let i=0;i<deleteButton.length;i++){
        deleteButton[i].addEventListener('click',deleteEvent);
    }
    for(let i=0;i<deleteButton.length;i++){
        editButton[i].addEventListener('click',editEvent);
    }

    document.getElementById('createButton').addEventListener('click',createEvent);





}());
