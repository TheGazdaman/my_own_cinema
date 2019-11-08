import React from 'react';
import ReactDom from 'react-dom';
import MovieIndex from './MovieIndex.jsx';
import MovieShow from './MovieShow.jsx';
import { BrowserRouter as Router, Route, Link, Switch } from 'react-router-dom';

export default class App extends React.Component {


  render() {
    return (
      <Router
        basename={'/react'}             // root of our project
      >
        <div>
       
              <h1>Movie app!</h1>
              <Link to='/movies'><h2>Index of movies</h2><br /></Link>
              <Link to='/movies/123'><h2>Detail of movie</h2><br /></Link>
          
          <Switch>
              <Route exact path="/movies">
                  <MovieIndex/>
              </Route>
              <Route path="/movies/:movie_id">
                  <MovieShow/>
              </Route>
              <Route><h1>Not found</h1></Route>
          </Switch>
          <footer>copyright</footer>
        </div>
      </Router>
    )
  }
}

if (document.getElementById('react-app')) {
  ReactDom.render(<App />, document.getElementById('react-app'));
}