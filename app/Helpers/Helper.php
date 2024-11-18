<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class Helper {

    public static function is_rtl( $current_locale = '' ) {
        $current_locale = ( ! empty( $current_locale ) ) ? $current_locale :  app()->getLocale();
        $is_rtl         = config( 'languages.' . $current_locale . '.is_rtl' );

        return ! empty( $is_rtl );
    }

    public static function rlt_ext( $current_locale = '' ) {
        $current_locale = ( ! empty( $current_locale ) ) ? $current_locale :  app()->getLocale();

        return self::is_rtl( $current_locale ) ? '.rtl' : '';
    }

    public static function get_translation_url( $locale = '' ) {

        return route( 'switch_lang', $locale );

    }

    public static function get_public_storage_asset_url( $path ) {

        $path = preg_replace( '/^(public)[\/]/', '', $path ) ;

        return asset( 'storage/' . $path );

    }
}


