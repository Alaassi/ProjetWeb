import React, { useState } from 'react';
import axios from 'axios';

const Write = ({ userName }) => {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const [category, setCategory] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();
    const post = { title, content, category, author: userName };

    try {
      await axios.post('http://localhost/backend/ajouterPost.php', post);
      alert('Publication créée avec succès');
    } catch (error) {
      console.error('Erreur lors de la création de la publication:', error);
    }
  };

  return (
    <div>
      <h2>Créer une nouvelle publication</h2>
      <form onSubmit={handleSubmit}>
        <input
          type="text"
          placeholder="Titre"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
          required
        />
        <textarea
          placeholder="Contenu"
          value={content}
          onChange={(e) => setContent(e.target.value)}
          required
        />
        <select
          value={category}
          onChange={(e) => setCategory(e.target.value)}
          required
        >
          <option value="">Sélectionner une catégorie</option>
          <option value="art">Art</option>
          <option value="science">Science</option>
          {/* Ajouter d'autres catégories ici */}
        </select>
        <button type="submit">Publier</button>
      </form>
    </div>
  );
};

export default Write;
