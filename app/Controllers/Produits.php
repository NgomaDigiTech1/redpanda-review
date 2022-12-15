<?php

namespace App\Controllers;

use App\Controllers\BaseController;
helper(['form', 'url', 'text','custom','inflector']);

class Produits extends BaseController
{
    /*
        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
    */
	public function index()
    {
        $model = model(ProductModel::class);

        $data = [
            'products' => $model->getProducts(),
        ];
		dd($data);
    }
    public function deleteProdCharact($segment = null) {
        if (!is_logged()) return redirect()->to('/login');
        $user_data = session()->get('user_data');
        if($user_data['u_role'] === 'admin'){
            $products = model(ProductModel::class);
            $produits = model(ProductCharactModel::class);
            $produits->deleteProdCharact($segment);
            $products->deleteProduct($segment);
        }else {
            echo "You are not allowed to delete";
        }
        echo 'Deleted successfully';
    }

    public function details($segment = null)
    {
        $model = model(ProductModel::class);

        $data['product'] = $model->getProduct($segment);

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find product with ID: ' . $segment);
        }
        return view('products/admin/details', $data);
    }

    // public function create()
    // {
    //     $model = model(BooksModel::class);

    //     if ($this->request->getMethod() === 'post' && $this->validate([
    //         'title' => 'required|min_length[1]|max_length[255]',
    //         'author' => 'required|min_length[1]|max_length[255]',
    //         'pages' => 'required|is_natural_no_zero',
    //     ])) {
    //         $model->insertBook(
    //             $this->request->getPost('title'),
    //             $this->request->getPost('author'),
    //             $this->request->getPost('pages'),
    //         );

    //         return redirect()->to('books');
    //     } else {
    //         echo view('templates/header');
    //         echo view('books/create', ['title' => 'Add a new book']);
    //         echo view('templates/footer');
    //     }
    // }

    // public function edit($segment = null)
    // {
    //     $model = model(BooksModel::class);

    //     $data['book'] = $model->getBook($segment);

    //     if (empty($data['book'])) {
    //         throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find book with ID: ' . $segment);
    //     }

    //     $data['title'] = $data['book']['title'];

    //     if ($this->request->getMethod() === 'post' && $this->validate([
    //         'title' => 'required|min_length[1]|max_length[255]',
    //         'author' => 'required|min_length[1]|max_length[255]',
    //         'pagesRead' => 'required|is_natural',
    //     ])) {
    //         $model->updateBook(
    //             $data['book']['_id'],
    //             $this->request->getPost('title'),
    //             $this->request->getPost('author'),
    //             $this->request->getPost('pagesRead'),
    //         );

    //         return redirect()->to('books');
    //     } else {
    //         echo view('templates/header', $data);
    //         echo view('books/edit', $data);
    //         echo view('templates/footer', $data);
    //     }
    // }

    public function deleteOrgProduct($segment) {
        if (!empty($segment)) {
            $model = model(ProductCharactModel::class);
            $model->deleteProduct($segment);
            session()->setFlashData("success", "Product Successfully Deleted");
        }
        return redirect()->to('products/getOrganisationProducts');
    }    
}
