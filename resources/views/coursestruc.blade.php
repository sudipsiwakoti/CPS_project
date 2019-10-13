{{-- This view will be included in courseinfo.blade.php for providing information about course structures --}}
				@if (($details->courseID) === 'C09067')
				<ul>
					<li> core program: 48 credit points </li>
					<li> major (field of practice), including capstone: 120 credit points </li>
					<li> professional engineering practice program: 48 credit points, plus 48 weeks of approved internship </li>
					<li> electives (within this component students may undertake a faculty-approved sub-major totalling 24 credit points): 24 credit points. Students in the Civil Engineering major, Structures stream are recommended to complete 12 credit points of electives from approved postgraduate structural engineering subjects. Students in the Civil and Environmental Engineering and Mechanical and Mechatronic Engineering majors are required to select the specialist stream in their major in place of the electives. </li>
				</ul>
				<p></p>
				<p><b> Industrial training/ professional practice </b></p>
				<p> The Diploma in Professional Engineering Practice requires the completion of two six-month internships and the Professional Engineering Practice Program. Completing 12 months of relevant engineering experience before graduating enables students to link learning in the workplace and learning at university, with each experience enhancing the other.</p>
				@elseif (($details->courseID) === 'C10209')
					<p> Student complete 144 credit points of study. </p>

				@elseif (($details->courseID) === 'C09049')
					<p> The course may be completed in one year of full-time or two years of part-time study. </p>

				@elseif (($details->courseID) === 'C09119')
					<p> Students are required to complete 192 credit points, comprising core (96 credit points), major (48 credit points), electives (24 credit points), and research preparation and project (24 credit points). </p>

				@elseif (($details->courseID) === 'C10278')
					<p> Students are required to complete 192 credit points, comprising 96 credit points in business and 96 credit points in information systems. The business component consists of core (48 credit points) and a business major (48 credit points). The information systems component consists of core (72 credit points) and stream choice (24 credit points). </p>

				@elseif (($details->courseID) === 'C10348')
					<p> Students must complete 144 credit points made up of 24 subjects - 11 core subjects (66 credit points), four economics elective subjects (24 credit points), a major or two sub-majors, or a sub-major and four electives comprising eight subjects (48 credit points) and one business elective subject (6 credit points). </p>

				@endif