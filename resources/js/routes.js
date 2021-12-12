import ShowMovieComponent from './components/ShowMovieComponent';

export default{
 
    mode : 'history',
 
    routes: [
        {
            path: '/movies/show',
            component: ShowMovieComponent,
        },
 
        // {
        //     path: '/about',
 
        //     component: About
        // },
    ]
 
};