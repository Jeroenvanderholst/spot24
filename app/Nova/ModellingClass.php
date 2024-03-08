<?php

namespace App\Nova;

use App\Nova\Resource;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\URL;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class ModellingClass extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\ModellingClass>
     */
    public static $model = \App\Models\ModellingClass::class;

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
        'modelling_class_id',
        'description',
        'group_id',
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
            ID::make()
                ->sortable()
                ->hideFromIndex(),

            Text::make('Modelling Class' ,'modelling_class_id')
                ->sortable()
                ->readonly(),

            Text::make('Description')
                ->readonly()
                ->filterable(),

            Number::make('Version')
                ->readonly(),
            
            Boolean::make('Modelling')
                ->readonly()
                ->filterable()
                ->hideFromIndex(),
            
            Number::make('Status')
                ->filterable()
                ->readonly()
                ->hideFromIndex(),

            Date::make('Mutation Date', 'mutation_date')
                ->filterable()
                ->sortable()
                ->readonly()
                ->hideFromIndex(),

            Number::make('Revision')
                ->hideFromIndex()
                ->readonly(),

            Date::make('Revision date', 'revision_date')
                ->readonly()
                ->hideFromIndex(),

            Text::make('Group ID', 'group_id')
                ->readonly()
                ->sortable(),

            URL::make('Drawing', 'drawing_uri')
                ->readonly()
                ->displayUsing(fn () => "Reference drawing"),

            Text::make('Changecode')
                ->readonly()
                ->filterable()
                ->hideFromIndex(),
            
            HasMany::make('Synonyms'),

            MorphMany::make('Translations', 'translatable'),


            
                




            
        
            

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
