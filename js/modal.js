document.addEventListener('DOMContentLoaded', function () {
    let formToDelete = null;
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            formToDelete = this;
            const nombre = this.closest('tr')?.querySelector('td:nth-child(2)')?.textContent?.trim() || '';
            document.getElementById('deleteModalText').innerHTML = `¿Eliminar el registro${nombre ? ' de <b>' + nombre + '</b>' : ''}? Esta acción no se puede deshacer.`;
            new bootstrap.Modal(document.getElementById('confirmDeleteModal')).show();
        });
    });
    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (formToDelete) formToDelete.submit();
        const modal = bootstrap.Modal.getInstance(document.getElementById('confirmDeleteModal'));
        if (modal) modal.hide();
        formToDelete = null;
    });
});