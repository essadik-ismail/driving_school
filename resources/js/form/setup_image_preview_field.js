
/**
 * Update Preview
 *
 * @return void
 */
function update_preview( event ) {

    const previewElementClass = event.target.getAttribute('data-preview-element');

    if ( ! previewElementClass ) {
        return;
    }

    const previewElement = document.querySelector( '.' + previewElementClass );

    if ( ! previewElement ) {
        return;
    }

    const [ file ] = event.target.files;

    if ( ! file ) {
        return;
    }

    previewElement.src = URL.createObjectURL( file );
}


/**
 * Setup Image Preview Field
 *
 * @return void
 */
 export function setup_image_preview_field() {
    const image_upload_fields = document.querySelectorAll( '.image-upload-field' );

    if ( ! image_upload_fields.length ) {
        return;
    }

    for ( const field of [ ...image_upload_fields ]  ) {
        field.addEventListener( 'change', update_preview );
    }
}


