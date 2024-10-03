<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capture Photo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f4f8;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-top: 20px;
        }
        #video {
            border-radius: 12px;
            border: 3px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 640px;
            height: 480px;
        }
        #photo {
            margin-top: 10px;
            border-radius: 12px;
            border: 5px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 100%;
            height: auto;
            display: none;
            transition: filter 0.3s ease, border 0.3s ease;
        }
        #capture, #download, #back, #delete {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            cursor: pointer;
            margin: 10px;
            transition: background-color 0.3s ease;
        }
        #capture:hover, #download:hover, #back:hover, #delete:hover {
            background-color: #0056b3;
        }
        #capture:active, #download:active, #back:active, #delete:active {
            background-color: #004494;
        }
        #download, #delete {
            display: none;
        }
        #back {
            background-color: #6c757d;
        }
        #back:hover {
            background-color: #5a6268;
        }
        .filters, .frames {
            margin: 20px 0;
        }
        .filters label, .frames label {
            font-size: 1rem;
            margin-right: 10px;
        }
        .filters select, .frames select {
            font-size: 1rem;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Frame Styles */
        .frame-analog {
            border: 10px solid #d6d6d6;
            background-color: #f5f5f5;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .frame-polaroid {
            border: 10px solid #fff;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            position: relative;
            display: inline-block;
        }
        .frame-polaroid::after {
            content: '';
            display: block;
            width: 80%;
            height: 100px;
            background: #fff;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
</head>
<body>
    <h1>Capture Photo</h1>
    <video id="video" autoplay></video>
    <button id="capture">Capture Photo</button>
    <canvas id="canvas" width="640" height="480" style="display: none;"></canvas>
    <div id="photo-container">
        <img id="photo" src="" alt="Captured Photo" />
    </div>

    <div class="filters">
        <label for="filter">Choose a filter:</label>
        <select id="filter">
            <option value="none">None</option>
            <option value="brightness(1.2)">Brightness</option>
            <option value="contrast(1.2)">Contrast</option>
            <option value="saturate(1.5)">Saturation</option>
            <option value="sepia(1)">Sepia</option>
            <option value="grayscale(1)">Grayscale</option>
            <option value="invert(1)">Invert</option>
            <option value="url(#bluesky)">Bluesky</option>
            <option value="url(#sidetoside)">Side to Side</option>
        </select>
    </div>

    <div class="frames">
        <label for="frame">Choose a frame:</label>
        <select id="frame">
            <option value="none">None</option>
            <option value="analog">Analog</option>
            <option value="polaroid">Polaroid</option>
        </select>
    </div>

    <button id="delete">Retake Photo</button>
    <button id="download">Download Photo</button>
    <button id="back" onclick="window.location.href='/dashboard';">Back to Dashboard</button>

    <!-- SVG Filters -->
    <svg width="0" height="0">
        <defs>
            <!-- Bluesky Filter -->
            <filter id="bluesky">
                <feColorMatrix type="matrix" values="0.4 0 0 0 0 0 0.5 0 0 0 0 0 0.6 0 0 0 0 0 1 0"/>
            </filter>
            <!-- Side to Side Filter -->
            <filter id="sidetoside">
                <feOffset result="offOut" in="SourceGraphic" dx="10" dy="0" />
                <feBlend in="SourceGraphic" in2="offOut" mode="multiply" />
            </filter>
        </defs>
    </svg>

    <script>
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const context = canvas.getContext('2d');
        const photo = document.getElementById('photo');
        const photoContainer = document.getElementById('photo-container');
        const downloadButton = document.getElementById('download');
        const deleteButton = document.getElementById('delete');
        const filterSelect = document.getElementById('filter');
        const frameSelect = document.getElementById('frame');

        // Get access to the camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error('Error accessing camera: ', err);
            });

        document.getElementById('capture').addEventListener('click', () => {
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            const dataURL = canvas.toDataURL('image/jpeg');

            // Display the captured photo
            photo.src = dataURL;
            photo.style.display = 'block';  // Show the photo
            downloadButton.style.display = 'block'; // Show the download button
            deleteButton.style.display = 'block'; // Show the delete button
        });

        // Apply selected filter to the photo
        filterSelect.addEventListener('change', () => {
            photo.style.filter = filterSelect.value;
        });

        // Apply selected frame to the photo
        frameSelect.addEventListener('change', () => {
            const frame = frameSelect.value;
            photoContainer.className = ''; // Clear existing frame classes
            if (frame === 'analog') {
                photoContainer.classList.add('frame-analog');
            } else if (frame === 'polaroid') {
                photoContainer.classList.add('frame-polaroid');
            }
        });

        // Download the photo
        downloadButton.addEventListener('click', () => {
            const link = document.createElement('a');
            link.href = photo.src;
            link.download = 'photo.jpg'; // Default file name
            link.click();
        });

        // Reset photo for retaking
        deleteButton.addEventListener('click', () => {
            photo.style.display = 'none';
            downloadButton.style.display = 'none';
            deleteButton.style.display = 'none';
            filterSelect.value = 'none';
            frameSelect.value = 'none';
            photo.style.filter = 'none';
            photoContainer.className = ''; // Clear frame classes
        });
    </script>
</body>
</html>
