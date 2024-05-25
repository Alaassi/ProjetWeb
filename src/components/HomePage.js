import React from 'react';
import { Link } from 'react-router-dom';

const HomePage = ({ user }) => {
  return (
    <div>
      <h2>Bienvenue, {user.username}</h2>
      <nav>
        <Link to="/write">Écrire une publication</Link>
        <Link to="/logout">Se déconnecter</Link>
      </nav>
      <div>
        <h3>Publications récentes</h3>
        {/* Ajouter le code pour afficher les publications */}
      </div>
    </div>
  );
};

export default HomePage;
