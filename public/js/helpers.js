
const deleteItem = (itemId, itemDescription, title = null) => {
    Swal.fire({
        title: title || 'Are you sure?',
        text: `You really want to delete this ${itemDescription}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel',
        reverseButtons: true,
        confirmButtonColor: '#ff5724',
        cancelButtonColor: '#570df8',
      }).then((result) => {
            if (! result.value) return ;

            document.getElementById(itemId).submit()

      })
}

