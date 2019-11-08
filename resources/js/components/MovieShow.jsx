import React from 'react'
import { Link, useParams } from 'react-router-dom'

export default function MovieShow() {
   console.log(useParams());
   //let movie_id = useParams().movie_id; stejné jako řádek dolu
   
   let {movie_id} = useParams();

    return (
      <div>
        <h2>Detail of movie {movie_id}</h2>
        <Link to='/movies'>Index of movies</Link>
      </div>
    )
}