trail-issue-tracker
===================

Website for mapping trails and collecting trouble issues using VGI.

Site utilizes:
* **Bootstrap 3** for responsive navigation (based off Bryan McBride's Bootleaf template)
* **Leaflet** for map
* **SQLite** for storage of user contributed trail issues
* **geojson** for storage of trail data

## installation

1. fork repository
2. download files
3. upload files to shared web host
4. move php.ini to public_html directory
5. replace bctmin.geojson with your own .geojson (in data directory and in code)
6. change colors of data (or not)
7. change basemaps (or not)
8. share with the world!

Don't have trail data in the *geojson* format, no worries, head over to [geojson.io](www.geojson.io) to import or draw your trails, then export to local or save to [Github](www.github.com).