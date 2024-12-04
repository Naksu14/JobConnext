import React from 'react'
import './Dashboard.css';
import 
{ BsCart3, BsGrid1X2Fill, BsFillArchiveFill,BsFillGrid3X2GapFill,BsPeopleFill,BsListCheck,BsMenuButtonWideFill,BsFillGearFill } 
from 'react-icons/bs';

import {LineChart, Line, BarChart, Bar, Rectangle, XAxis, YAxis, CartesianGrid, Tooltip, Legend, ResponsiveContainer } from 'recharts';



function Dashboard() {
  const data = [
    {
      name: 'Pending',
      uv: 4000,
    },
    {
      name: 'Approve',
      uv: 3000,
    },
    {
      name: 'Reject',
      uv: 2000,
    }
  ];
  return (
    <main className='Dashboard-Container'>
        <div className='Dashboard-title'>
             <h3>DASHBOARD</h3>
        </div>
        <div className='Dashboard-Card'>
            <div className='Card'>
              <BsFillArchiveFill className='card_iicon'/>
              <div className='Card-inner'>
                  <h3>BLUE COLLAR</h3>
                  <h1>439</h1>
              </div>
            </div>
            <div className='Card'>
              <BsFillArchiveFill className='card_iicon'/>
              <div className='Card-inner'>
                  <h3>CLIENT</h3>
                  <h1>260</h1>
              </div>
            </div>

        </div>
        <div className="Dashboard-charts">
          {/* Blue Collar Chart */}
          <div className="chart">
            <h3 className="chart-header">Blue Collar</h3>
            <ResponsiveContainer width="100%" height="100%">
              <BarChart
                width={500}
                height={300}
                data={data}
                margin={{
                  top: 10,
                  right: 30,
                  left: 20,
                  bottom: 5,
                }}
              >
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="name" />
                <YAxis />
                <Tooltip />
                <Bar dataKey="uv" fill="#3679FE" activeBar={<Rectangle fill="#7fa6f5" stroke="#161D6F" />} />
              </BarChart>
            </ResponsiveContainer>
          </div>

          {/* Client Chart */}
          <div className="chart">
            <h3 className="chart-header">Client</h3>
            <ResponsiveContainer width="100%" height="100%">
              <BarChart
                width={500}
                height={300}
                data={data}
                margin={{
                  top: 10,
                  right: 30,
                  left: 20,
                  bottom: 5,
                }}
              >
                <CartesianGrid strokeDasharray="3 3" />
                <XAxis dataKey="name" />
                <YAxis />
                <Tooltip />
                <Bar dataKey="uv" fill="#E46232" activeBar={<Rectangle fill="#f5a284" stroke="#ff4400" />} />
              </BarChart>
            </ResponsiveContainer>
          </div>
        </div>

        <div className="nd-charts">
          <h3 className="chart-header">Job Categories</h3>
            <ResponsiveContainer width="100%" height="100%">
                <LineChart
                  width={500}
                  height={300}
                  data={data}
                  margin={{
                    top: 5,
                    right: 30,
                    left: 20,
                    bottom: 5,
                  }}
                >
                  <CartesianGrid strokeDasharray="3 3" />
                  <XAxis dataKey="name" />
                  <YAxis />
                  <Tooltip />
                  <Legend />
                  <Line type="monotone" dataKey="uv" stroke="#82ca9d" />
                </LineChart>
            </ResponsiveContainer>
        </div>

        
    </main>
  )
}

export default Dashboard
