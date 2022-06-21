define(['uiComponent'],function (Component){
    'use strict';

    return Component.extend({
        default: {
            template: 'Learning_Blog/template/blog'
        },
        initialize: function (){
            this._super();
            console.log(this.title);

            return this;
        }
    });
});
