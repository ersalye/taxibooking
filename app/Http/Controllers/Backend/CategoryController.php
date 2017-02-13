<?php
/**
 * Created by PhpStorm.
 * User: phuong
 * Date: 10/13/2016
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\ManageCategoryRequest;
use App\Http\Requests\Backend\Category\ManagerCategoryRequest;
use App\Http\Requests\Backend\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;
use App\Models\Category\Category;
use App\Repositories\Backend\Category\CategoryRepositoryContract;
use Yajra\Datatables\Request;
use Yajra\Datatables\Facades\Datatables;



class CategoryController extends Controller
{


    protected $category;

    public function __construct(CategoryRepositoryContract $categoryContract)
    {
            $this->category = $categoryContract;
    }

    public function index() {

           return view('backend.categories.index');
    }




    public function get(ManagerCategoryRequest $request) {
        return Datatables::of($this->category->getForDataTable($request->get("status"),$request->get("trashed")))

            ->addColumn('actions', function($user) {
                return $user->action_buttons;
            })
            ->make(true);
    }


    public function create(Request $request) {
       return view("backend.categories.create");
    }

    public function store(StoreCategoryRequest $request) {

        $this->category->create($request->all());

        return redirect()->route('admin.category.index')->withFlashSuccess(trans('alerts.backend.categories.created'));

    }



    public function edit(Category $category) {


        return view('backend.categories.edit')
            ->withCategory($category);
    }


    public function update(Category $category,UpdateCategoryRequest $request) {
            $this->category->update($category,$request->all());
            return redirect()->route("admin.category.index")->withFlashSuccess(trans('alerts.backend.categories.updated'));
    }



    public function destroy(Category $category, ManagerCategoryRequest $request) {
        $this->category->destroy($category);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.categories.deleted'));
    }



    public function deactivated(ManagerCategoryRequest $request) {
        return view('backend.categories.deactivated');
    }


    /**
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function deleted(ManagerCategoryRequest $request)
    {
        return view('backend.categories.deleted');
    }


    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function delete(Category $category, ManagerCategoryRequest $request)
    {

       $this->category->delete($category);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.categories.deleted_permanently'));
    }




    /**
     * @param User $deletedUser
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function restore(Category $deletedCategory, ManagerCategoryRequest $request)
    {
        $this->category->restore($deletedCategory);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.restored'));
    }







    /**
     * @param User $user
     * @param $status
     * @param ManageUserRequest $request
     * @return mixed
     */
    public function mark(Category $category, $status, ManagerCategoryRequest $request)
    {

        $this->category->mark($category, $status);
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.categories.updated'));
    }



}