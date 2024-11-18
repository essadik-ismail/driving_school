import { setup_image_preview_field } from "./setup_image_preview_field";
import { setup_clear_input_file_field } from "./setup_clear_input_file_field";

/**
 * Init
 *
 * @return void
 */
function init() {
    setup_image_preview_field();
    setup_clear_input_file_field();
}


( init )();
