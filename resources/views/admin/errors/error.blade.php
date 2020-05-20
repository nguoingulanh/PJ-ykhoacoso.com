<script>
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    Swal.fire({
        "title": "{{$error}}",
        "text": "",
        "timer": 5000,
        "width": "32rem",
        "padding": "1.25rem",
        "showConfirmButton": false,
        "showCloseButton": true,
        "customClass": {
            "container": null,
            "popup": null,
            "header": null,
            "title": null,
            "closeButton": null,
            "icon": null,
            "image": null,
            "content": null,
            "input": null,
            "actions": null,
            "confirmButton": null,
            "cancelButton": null,
            "footer": null
        },
        "toast": true,
        "icon": "error",
        "position": "top-end"
    });
    @endforeach
    @endif
</script>
