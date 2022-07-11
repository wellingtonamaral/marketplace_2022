<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request)
    {
        $photoName = $request->get('photoName');

        // /** remover dos arquivos */
        if(Storage::disk('public')->exists($photoName))
        {
            Storage::disk('public')->delete($photoName);
        }
        // /** remover a imagem do Bd*/
        $removePhoto = ProductPhoto::where('image', $photoName);

        // dd($removePhoto); //se tiver resultado, apaga essa linha e executa com o proximo dd

        $productId = $removePhoto->first()->product_id;

        // dd($productId ); //se tiver o id o erro ta em outro local

        $removePhoto->delete();

        flash('Imagem removida com Sucesso!')->success();
        return redirect()->route('admin.products.edit', ['product' => $productId]);
        // return redirect()->route('admin.products.index');


    }
}

