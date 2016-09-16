import {Component} from 'angular2/core';
import {RouteParams} from "angular2/router"
import {Api} from "../../../services/api";

//import {IX} from "../../../interfaces/IX";



import {
    ROUTER_DIRECTIVES
} from 'angular2/router';

@Component({
    templateUrl: './app/components/pessoas/detail/index.html',
    directives: [ROUTER_DIRECTIVES]
})

export class PessoaDetailComponent
{
    //var pessoa: any;
    private pessoa: any;

    constructor(pessoa: any, private _api: Api, private _params: RouteParams)
    {
        this._api.getPessoa(_params.get("id")).then(
            (res: any) => {
                this.pessoa = res.pessoa;
            },
            (error) => {
                console.error(error);
            }
        )
    }
}
