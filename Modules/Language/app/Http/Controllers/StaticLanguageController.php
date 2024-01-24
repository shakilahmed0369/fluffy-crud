<?php

namespace Modules\Language\app\Http\Controllers;

use App\Enums\RedirectType;
use App\Http\Controllers\Controller;
use App\Traits\RedirectHelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Modules\Language\app\Models\Language;
use Modules\Language\App\Traits\LanguageTrait;

class StaticLanguageController extends Controller {
    use LanguageTrait, RedirectHelperTrait;

    public function editStaticLanguages( $code ) {
        abort_unless( checkAdminHasPermission( 'language.edit' ), 403 );
        $filePath = base_path( 'lang/' . $code . ".json" );
        if ( !File::exists( $filePath ) ) {
            return redirect()->route( 'admin.languages.index' )->with( [
                'alert-type' => 'warning',
                'messege'    => trans( 'Not Found!' ),
            ] );
        }

        $language = Language::where( "code", $code )->firstOrFail();
        $languages = Language::all();
        $data = json_decode( File::get( $filePath ), true );
        return view( 'language::edit-static-language', compact( 'data', 'language', 'languages' ) );
    }

    public function updateStaticLanguages( Request $request, $code ) {
        abort_unless( checkAdminHasPermission( 'language.update' ), 403 );
        $filePath = base_path( 'lang/' . $code . ".json" );
        if ( !File::exists( $filePath ) ) {
            return redirect()->route( 'admin.languages.index' )->with( [
                'alert-type' => 'warning',
                'messege'    => trans( 'Not Found!' ),
            ] );
        }
        Language::where( "code", $code )->firstOrFail();

        $dataArray = [];

        foreach ( $request->values as $index => $value ) {
            $dataArray[$index] = $value;
        }

        File::put( $filePath, json_encode( $dataArray, JSON_PRETTY_PRINT ) );

        return $this->redirectWithMessage( RedirectType::UPDATE->value );
    }
}
