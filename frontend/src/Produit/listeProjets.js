import React, { useEffect, useState } from "react";
import axios from "axios";
export default function ListeProjets() {
  const [projets, setProjets] = useState([]);

  useEffect(() => {
    axios
      .get("http://127.0.0.1:8000/api/projets")
      .then((res) => {
        setProjets(res.data);
        console.log(res.data);
      })
      .catch((err) => {
        console.error("Error fetching projets:", err);
      });
  }, []);

  return (
    <div>
      <h1>Liste des Projets</h1>
    </div>
  );
}
