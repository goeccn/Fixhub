<?php

/*
 * This file is part of Fixhub.
 *
 * Copyright (C) 2016 Fixhub.org
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Fixhub\Http\Controllers\Admin;

use Fixhub\Http\Controllers\Controller;
use Fixhub\Http\Requests\StoreProjectGroupRequest;
use Fixhub\Models\DeployTemplate;
use Fixhub\Models\Key;
use Fixhub\Models\Project;
use Fixhub\Models\ProjectGroup;
use Illuminate\Http\Request;

/**
 * Project group management controller.
 */
class ProjectGroupController extends Controller
{
    /**
     * Display a listing of the groups.
     *
     * @return Response
     */
    public function index()
    {
        $groups = ProjectGroup::orderBy('order')
                    ->paginate(config('fixhub.items_per_page', 10));

        return view('admin.groups.index', [
            'title'    => trans('groups.manage'),
            'groups'   => $groups
        ]);
    }

    /**
     * Shows the create project group view.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        return $this->index($request)->withAction('create');
    }

    /**
     * Store a newly created group in storage.
     *
     * @param  StoreProjectGroupRequest $request
     *
     * @return Response
     */
    public function store(StoreProjectGroupRequest $request)
    {
        return ProjectGroup::create($request->only(
            'name'
        ));
    }

    /**
     * Update the specified group in storage.
     *
     * @param ProjectGroup $group
     * @param StoreProjectGroupRequest $request
     *
     * @return Response
     */
    public function update(ProjectGroup $group, StoreProjectGroupRequest $request)
    {
        $group->update($request->only(
            'name'
        ));

        return $group;
    }

    /**
     * Re-generates the order for the supplied groups.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function reorder(Request $request)
    {
        $order = 0;

        foreach ($request->get('groups') as $group_id) {
            $group = ProjectGroup::findOrFail($group_id);
            $group->update([
                'order' => $order,
            ]);

            $order++;
        }

        return [
            'success' => true,
        ];
    }

    /**
     * Remove the specified group from storage.
     *
     * @param ProjectGroup $group
     *
     * @return Response
     */
    public function destroy(ProjectGroup $group)
    {
        $group->delete();

        return [
            'success' => true,
        ];
    }
}
