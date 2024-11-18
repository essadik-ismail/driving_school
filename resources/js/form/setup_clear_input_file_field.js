/**
 * Setup Clear Input
 *
 * @return void
 */
function setup_clear_input( event ) {

    if ( ! input_has_file( this )  ) {
        return;
    }

    event.preventDefault();

    // Clear Input
    clear_input( this );

    // Update Status
    this.setAttribute( 'data-input-has-file', 0 );

    // Update Input Removal Status Field
    update_input_removal_status_field( this );

    // Update Clear Button Icon
    update_clear_button_icon( this );

    // Update Clear Button Title
    update_clear_button_title( this );

    // Reset Preview
    reset_preview( this );
}

/**
 * Update Clear Button Icon
 *
 * @return void
 */
function update_clear_button_icon( self ) {
    const button_img = self.querySelector( 'img' );
    const img_key    = input_has_file( self ) ? 'data-clear-icon' : 'data-pick-icon';
    const img        = self.getAttribute( img_key );

    button_img.src = img;
}

/**
 * Update Clear Button Title
 *
 * @return void
 */
function update_clear_button_title( self ) {
    const img_key = input_has_file( self ) ? 'data-clear-title' : 'data-pick-title';
    const title   = self.getAttribute( img_key );

    self.setAttribute( 'title', title );
}

/**
 * Clear Input
 *
 * @return bool
 */
function clear_input( self ) {
    const inputElement = get_input_element( self );
    const value        = inputElement.value;

    if ( ! value ) {
        return false;
    }

    const form = document.createElement('form');
    const ref  = inputElement.nextSibling;

    form.appendChild( inputElement );
    form.reset();
    ref.parentNode.insertBefore( inputElement, ref );

    return true;
}

/**
 * Reset Preview
 *
 * @return bool
 */
function reset_preview( self ) {
    const previewElementClass = self.getAttribute('data-preview-element');
    const defaultPreviewImage = self.getAttribute('data-default-preview-image');

    if ( ! previewElementClass ) {
        return false;
    }

    const previewElement = document.querySelector( '.' + previewElementClass );

    if ( ! previewElement ) {
        return false;
    }

    previewElement.src = ( defaultPreviewImage ) ? defaultPreviewImage : '';

    return true;
}

/**
 * Get Input Element
 *
 * @return mixed
 */
function get_input_element( self ) {
    const inputElementID    = self.getAttribute('data-input-element-id');
    const inputElementClass = self.getAttribute('data-intput-element-class');

    if ( ! inputElementID && ! inputElementClass ) {
        return null;
    }

    const inputElementKey = ( inputElementID ) ? '#' + inputElementID : '.' + inputElementClass ;
    const inputElement = document.querySelector( inputElementKey );

    if ( ! inputElement ) {
        return null;
    }

    return inputElement;
}

/**
 * Input Has File
 *
 * @return bool
 */
function input_has_file( self ) {
    const input_has_file = self.getAttribute('data-input-has-file');

    if ( ! input_has_file ) {
        return false;
    }

    if ( '0' == input_has_file  ) {
        return false;
    }

    return true;
}

/**
 * Update Input Removal Status Field
 *
 * @return void
 */
function update_input_removal_status_field( self ) {
    const field_key = self.getAttribute('data-input-removal-status-field');

    console.log( {field_key} );

    if ( ! field_key ) {
        return;
    }

    const field = document.querySelector( '.' + field_key );

    console.log( {field} );

    if ( ! field ) {
        return;
    }

    field.value = input_has_file( self ) ? '' : '1';
}

/**
 * Update Status
 *
 * @return void
 */
function update_status( self, event ) {
    const [ file ] = event.target.files;

    const status = ( file ) ? 1 : 0;

    self.setAttribute( 'data-input-has-file', status );
}


/**
 * Setup Clear Input File Field
 *
 * @return void
 */
 export function setup_clear_input_file_field() {
    const items = document.querySelectorAll( '.clear-input-file-btn' );

    if ( ! items.length ) {
        return;
    }

    for ( const item of [ ...items ]  ) {

        const inputElement = get_input_element( item );

        if ( ! inputElement ) {
            continue;
        }

        // Setup clear input
        item.addEventListener( 'click', setup_clear_input );

        // Input element on change tasks
        inputElement.addEventListener( 'change', function(event) {
            // Update Status
            update_status( item, event );

            // Update Input Removal Status Field
            update_input_removal_status_field( item );

            // Update Clear Button Icon
            update_clear_button_icon( item );

            // Update Clear Button Title
            update_clear_button_title( item );
        });
    }

}


