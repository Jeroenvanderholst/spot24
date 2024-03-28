<?php

namespace App\Nova;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Http\Requests\NovaRequest;

class ModellingClassFeature extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ModellingClassFeature>
     */
    public static $model = \App\Models\ModellingClassFeature::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'feature_id',
        'unit_id',
        'imp_unit_id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Class id', 'modelling_class_id')->readonly()->sortable(),
            Number::make('Sort nr')->readonly()->sortable(),
            Text::make('Feature ID')->readonly(),
            Text::make('Unit ID', 'unit_id')->readonly(),
            Text::make('Imp unit ID', 'imp_unit_id')->readonly(),
            Text::make('Changecode')->readonly()->hideFromIndex(),
            KeyValue::make('Releases')->readonly()->hideFromIndex(),

           // HasMany::make('featurevalue.value_id'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
