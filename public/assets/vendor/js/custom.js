
window.addEventListener("addForm",event=>{
    document.querySelector(".custom_seance").classList.add("show_custom_seance")
})
window.addEventListener("hideForm",event=>{
    document.querySelector(".custom_seance").classList.remove("show_custom_seance");
})

window.addEventListener("formUpdate",event=>{
    document.querySelector(".custom_seance_update").classList.add("show_custom_seance");
})
window.addEventListener("hideFormUpdate",event=>{
    document.querySelector(".custom_seance_update").classList.remove("show_custom_seance");
})

// Success messages
window.addEventListener("updateSuccess",event=>{
    Swal.fire({
        icon: 'success',
        text :'A été mis à jour avec succès.'
    })
})
window.addEventListener("seanceSuccess",event=>{
    Swal.fire({
        icon: 'success',
        text :'La nouvelle séance a été créée avec succès.'
    })
})
window.addEventListener("eventSuccess",event=>{
    Swal.fire({
        icon: 'success',
        text :'A été ajouté avec succèss.'
    })
})


window.addEventListener("showDeleteConfirmation",event =>{
    Swal.fire({
        title: 'Vous voulez vraiment suppimer ?',
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: 'Avertissement',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimer!'
      }).then((result) => {
        if (result.isConfirmed) {
            Livewire.emit("deleteConfirmed")
        }
      })
})
window.addEventListener("moduleDeleted",event =>{
    Swal.fire(
        'Supprimé!',
        'A été bien supprimé.',
        'Succès'
    )
})


window.addEventListener("checkFilter",event =>{
    Swal.fire({
        icon: 'warning',
        text :'Obligatoire de selectionner les champs en rouge.'
    })
})
window.addEventListener("ValidDate",event =>{
    Swal.fire({
        icon: 'warning',
        text :'Choisissez une date de début valide'
    })
})

// Datatable js
$(document).ready(function() {
    $(".mytable").dataTable().fnDestroy()
    $('.mytable').DataTable({
        lengthChange: false,
        dom: 'Bfrtip',
        lengthMenu: [
            [ 5,10, 25, 50, -1 ],
            [ '5 Afficher','10 Afficher', '25 Afficher', '50 Afficher', 'Afficher tout' ]
        ],
        buttons: [
            'copyHtml5',
            'csvHtml5',
            'pdfHtml5',
            {
                extend: 'colvis',
                columns: ':not(.noVis)'
            },
            'pageLength',
        ],
    });
});
