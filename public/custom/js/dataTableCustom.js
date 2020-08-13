$.noConflict();
jQuery( document ).ready(function( $ ) {
    $('#myTable').DataTable({
        "lengthMenu": [[3, 5, 10, 15, -1], [3, 5, 10, 15, "All"]]
    } );
} );
