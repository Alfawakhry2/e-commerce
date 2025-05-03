<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function allcategories()
    {
        $categories = Category::paginate(6);
        return view('Admin.allcategories', compact('categories'));
    }

    public function showcategory($id)
    {
        $category = Category::findorfail($id);
        return view('Admin.showcategory', compact('category'));
    }

    public function categoryproducts($id){
        $category = Category::findorfail($id);
        $products = Product::where('category_id' , $category->id)->paginate(5);
        return view('Admin.allproducts' , compact('products' , 'category'));
    }

    public function add()
    {
        return view('Admin.addcategory');
    }
    public function store(Request $request)
    {
        //fetch

        //validate
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'small_desc' => ['required', 'string', 'max:100'],
            'desc' => ['required', 'string'],
            'image' => ['required', 'mimes:png,jpg,jpeg'],
        ]);

        //store image and rename
        $data['image'] = Storage::putFile('Categories', $data['image']);

        //store data
        Category::create($data);

        //redirect with success

        return redirect(url('allcategories'))->with('success', 'Category Added Successfully');
    }



    //update
    public function edit($id)
    {
        $category = Category::findorfail($id);
        return view('Admin.editcategory', compact('category'));
    }


    public function update(Request $request, $id)
    {
        //check if category exict or no
        $category = Category::findOrfail($id);

        // validate
        // $request->validate([
        //     'name'=> '',
        //     'small_desc'=>"string|max:100",
        //     'desc'=>"string",
        //     'image'=>"string|mimes:png,jpg,jpeg",
        // ]);

        $name = $category->name;
        $small_desc = $category->small_desc;
        $desc = $category->desc;
        $image = $category->image;

        if ($request->has('name') && $request->name != null) {
            $request->validate(['name' => 'max:100']);
            $name = $request->name;
        }
        if ($request->has('small_desc') && $request->small_desc != null) {
            $request->validate(['small_desc' => 'string|max:100']);
            $small_desc = $request->small_desc;
        }
        if ($request->has('desc') && $request->desc != null) {
            $request->validate(['desc' => 'string']);
            $desc = $request->desc;
        }
        if ($request->has('image') && $request->image != null) {
            if ($category->image == null) {
                $image = Storage::putFile('Categories', $request->image);
            } else {
                // $request->validate(['image' => 'string|mimes:jpg,png,jpeg']);
                Storage::delete($category->image);
                $image = Storage::putFile('Categories', $request->image);
            }
        }

        //update
        $category->update([
            "name" => $name,
            "small_desc" => $small_desc,
            "desc" => $desc,
            "image" => $image,
        ]);


        //redirect
        return redirect(url("showcategory/$category->id"))->with('success', 'Category Updated Successfully');
    }
}
