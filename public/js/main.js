function previewImage(id) {
    const image = document.querySelector(`#${id}`);
    const imgPreview = document.querySelector(`.${id}-preview`);

    if (image && image.files && image.files[0]) {
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        };
    } else {
        console.error('No file selected or file input element not found.');
    }
}