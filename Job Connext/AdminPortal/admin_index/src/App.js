import React from 'react';
import './App.css';
import Navbar from './components/navbar/Navbar';
import Sidebar from './components/Sidebar/sidebar';

function App() {
  return (
    <div className="App">
      <Navbar />
      <Sidebar />
    </div>
  );
}

export default App;
