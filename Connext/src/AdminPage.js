import React from 'react';
import './AdminPage.css';
import Navbar from './components/AdminPortal/navbar/Navbar';
import Sidebar from './components/AdminPortal/Sidebar/sidebar';
import Dashboard from './components/AdminPortal/dashBoard/Dashboard';

function App() {
  return (
    <div className="App">
      <Navbar />
      <div className='grid-container'>
          <Sidebar />
          <Dashboard />
      </div>
      
    </div>
  );
}

export default App;
